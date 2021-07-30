package com.project.backendjavaspringboot.service;

import com.project.backendjavaspringboot.entity.EmployeeEntity;
import com.project.backendjavaspringboot.repository.EmployeeRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import java.util.List;
import java.util.Optional;

@Service
public class EmployeeService {
    @Autowired
    private EmployeeRepository employeeRepository;

    public List<EmployeeEntity> getAllEmployee(){
        return (List<EmployeeEntity>) employeeRepository.findAll();
    }

    public EmployeeEntity addEmployee(EmployeeEntity employee){
       return employeeRepository.save(employee);
    }

    public Optional<EmployeeEntity> getEmployee(int id){
        Optional<EmployeeEntity> emp = employeeRepository.findById(id);
        return  emp;
    }

    public void deleteEmployee(int id){
        employeeRepository.deleteById(id);
    }
}