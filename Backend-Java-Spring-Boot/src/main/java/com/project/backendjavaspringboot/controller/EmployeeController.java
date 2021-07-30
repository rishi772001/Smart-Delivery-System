package com.project.backendjavaspringboot.controller;

import com.project.backendjavaspringboot.entity.EmployeeEntity;
import com.project.backendjavaspringboot.service.EmployeeService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.*;

import java.util.List;
import java.util.Optional;

@RestController
@RequestMapping("/employees")
@CrossOrigin(origins = "*")
public class EmployeeController {
    @Autowired
    private EmployeeService employeeService;

    @GetMapping
    public List<EmployeeEntity> getAllEmployee(){
        return employeeService.getAllEmployee();
    }

    @PostMapping
    public EmployeeEntity addEmployee(@RequestBody EmployeeEntity employee){
        return employeeService.addEmployee(employee);
    }

    @GetMapping("/{id}")
    public Optional<EmployeeEntity> getEmployee(@PathVariable("id") int id){
        return employeeService.getEmployee(id);
    }

    @DeleteMapping("/{id}")
    public void deleteEmployee(@PathVariable("id") int id){ employeeService.deleteEmployee(id); }

}


