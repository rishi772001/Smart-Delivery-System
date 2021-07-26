package com.project.backendjavaspringboot.controller;

import com.project.backendjavaspringboot.entity.AdminEntity;
import com.project.backendjavaspringboot.entity.EmployeeEntity;
import com.project.backendjavaspringboot.service.AdminService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.*;

import java.util.List;
import java.util.Optional;

@RestController
@RequestMapping("/admins")
public class AdminController {
    @Autowired
    private AdminService adminService;

    @GetMapping
    public List<AdminEntity> getAllAdmins(){
        return adminService.getAllAdmins();
    }

    @PostMapping
    public void addAdmin(@RequestBody AdminEntity admin){
        adminService.addAdmin(admin);
    }

    @GetMapping("/{id}")
    public Optional<AdminEntity> getAdmin(@PathVariable("id") int id){
        return adminService.getAdmin(id);
    }

}
