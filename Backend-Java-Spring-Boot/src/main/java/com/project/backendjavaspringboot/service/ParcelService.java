package com.project.backendjavaspringboot.service;

import com.project.backendjavaspringboot.entity.EmployeeEntity;
import com.project.backendjavaspringboot.entity.ParcelEntity;
import com.project.backendjavaspringboot.repository.ParcelRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import java.util.ArrayList;
import java.util.List;
import java.util.Optional;

@Service
public class ParcelService {
    @Autowired
    private ParcelRepository parcelRepository;

    @Autowired
    private EmployeeService employeeService;

    private EmployeeEntity findEmployee(ParcelEntity parcel) {
        // 12, Sardar Patel Rd, Anna University, Guindy, Chennai, Tamil Nadu 600025


        String address = parcel.getToAddress();
        if(address == null)
            return null;
        String[] words = address.split(",");
        for (String i : words) {
            List<EmployeeEntity> employees = employeeService.getAllEmployee();
            for (EmployeeEntity emp : employees) {
                // TODO: update method to compare
                String empArea = emp.getArea().toLowerCase().trim();
                String addressArea = i.toLowerCase().trim();
                if (empArea.equals(addressArea))
                    return emp;
            }
        }
        return null;
    }

    public List<ParcelEntity> getAllParcels() {
        return (List<ParcelEntity>) parcelRepository.findAll();
    }

    public List<ParcelEntity> getParcelsByEmployee(int id) {
        Optional<EmployeeEntity> employee = employeeService.getEmployee(id);
        List<ParcelEntity> parcels = null;
        if (employee.isPresent()) {
            parcels = parcelRepository.findParcelEntitiesByEmployee(employee.get());
        }
        return parcels;
    }

    public Optional<ParcelEntity> getParcel(int id) {
        return parcelRepository.findById(id);
    }

    public EmployeeEntity addParcel(ParcelEntity parcel) {
        EmployeeEntity employee = findEmployee(parcel);
        if (employee == null) {
            return null;
        }
        parcel.setEmployee(employee);
        parcelRepository.save(parcel);
        return employee;
    }

    private int calculateDistance(String a, String b) {
        return 1;
        // TODO: calculate distance
    }

    public List<ParcelEntity> getPath(int empId) {
        // find employee
        Optional<EmployeeEntity> employeeEntityOptional = employeeService.getEmployee(empId);
        EmployeeEntity employee = null;
        if (employeeEntityOptional.isPresent()) {
            employee = employeeEntityOptional.get();
        }
        // get employee's parcels
        List<ParcelEntity> parcelsToBeDelivered = parcelRepository.findParcelEntitiesByEmployeeAndStatusEquals(employee, "pending");

        // Add office location
        ParcelEntity office = new ParcelEntity();
        office.setParcelId(-1);
        office.setStatus("delivered");
        office.setToAddress("205, Thiruvottiyur High Rd, Rajakadai, Tiruvottiyur, Chennai, Tamil Nadu 600019");
        parcelsToBeDelivered.add(office);
        // Create TSP
        TravellingSalesman tsp = new TravellingSalesman(parcelsToBeDelivered.size());
        // calculate distance
        for (int i = 0; i < parcelsToBeDelivered.size(); i++) {
            for (int j = 0; j < parcelsToBeDelivered.size(); j++) {
                if(i == j){
                    tsp.addDistance(i, j, 0);
                } else {
                    tsp.addDistance(i, j, calculateDistance(parcelsToBeDelivered.get(i).getToAddress(), parcelsToBeDelivered.get(j).getToAddress()));
                }
            }
        }
        // get path, size - 1 because starting point is always office
        ArrayList<Integer> path = tsp.findPath(parcelsToBeDelivered.size() - 1);
        // return path
        ArrayList<ParcelEntity> tspPath = new ArrayList<>();
        for(Integer i : path){
            tspPath.add(parcelsToBeDelivered.get(i));
        }
        return tspPath;
    }

    public ParcelEntity updateStatus(int id){
        Optional<ParcelEntity> optParcel = parcelRepository.findById(id);
        ParcelEntity parcel = null;

        if(optParcel.isPresent()){
            parcel = optParcel.get();
        }
        if(parcel != null){
            parcel.setStatus("delivered");
            parcelRepository.save(parcel);
        }
        return parcel;
    }
}
