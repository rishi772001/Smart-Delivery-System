package com.project.backendjavaspringboot.service;

import com.project.backendjavaspringboot.entity.AdminEntity;
import com.project.backendjavaspringboot.entity.EmployeeEntity;
import com.project.backendjavaspringboot.repository.AdminRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Component;
import org.springframework.stereotype.Service;

import java.util.List;
import java.util.Optional;

@Service
public class AdminService {
    @Autowired
    private AdminRepository adminRepository;

    public List<AdminEntity> getAllAdmins(){
        return (List<AdminEntity>) adminRepository.findAll();
    }

    public AdminEntity addAdmin(AdminEntity admin){
        return adminRepository.save(admin);
    }

    public Optional<AdminEntity> getAdmin(int id){
        Optional<AdminEntity> emp = adminRepository.findById(id);
        return  emp;
    }
}
