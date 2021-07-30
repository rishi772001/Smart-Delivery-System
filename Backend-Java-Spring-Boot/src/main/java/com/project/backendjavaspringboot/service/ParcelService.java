package com.project.backendjavaspringboot.service;

import com.project.backendjavaspringboot.entity.EmployeeEntity;
import com.project.backendjavaspringboot.entity.ParcelEntity;
import com.project.backendjavaspringboot.repository.ParcelRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import java.util.List;
import java.util.Optional;
import java.util.concurrent.atomic.AtomicReference;

@Service
public class ParcelService {
    @Autowired
    private ParcelRepository parcelRepository;

    @Autowired
    private EmployeeService employeeService;

    private EmployeeEntity findEmployee(ParcelEntity parcel){
        // 12, Sardar Patel Rd, Anna University, Guindy, Chennai, Tamil Nadu 600025


        String address = parcel.getToAddress();
        String[] words = address.split(",");
        for(String i: words){
            List<EmployeeEntity> employees = employeeService.getAllEmployee();
            for(EmployeeEntity emp : employees){
                // TODO: update method to compare
                String empArea = emp.getArea().toLowerCase().trim();
                String addressArea = i.toLowerCase().trim();
                if(empArea.equals(addressArea))
                    return emp;
            }
        }
        return null;
    }

    public List<ParcelEntity> getAllParcels(){
        return (List<ParcelEntity>) parcelRepository.findAll();
    }

    public List<ParcelEntity> getParcelsByEmployee(int id){
        Optional<EmployeeEntity> employee = employeeService.getEmployee(id);
        List<ParcelEntity> parcels = null;
        if(employee.isPresent()) {
            parcels = parcelRepository.findParcelEntitiesByEmployee(employee.get());
        }
        return parcels;
    }

    public Optional<ParcelEntity> getParcel(int id){
        return parcelRepository.findById(id);
    }

    public EmployeeEntity addParcel(ParcelEntity parcel){
        EmployeeEntity employee = findEmployee(parcel);
        parcel.setEmployee(employee);
        parcelRepository.save(parcel);
        return employee;
    }


}
