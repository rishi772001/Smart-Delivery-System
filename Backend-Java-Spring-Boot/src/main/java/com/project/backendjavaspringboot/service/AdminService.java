package com.project.backendjavaspringboot.service;

import com.project.backendjavaspringboot.entity.AdminEntity;
import com.project.backendjavaspringboot.repository.AdminRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Component;

import java.util.List;

@Component
public class AdminService {
    @Autowired
    private AdminRepository adminRepository;
    public List<AdminEntity> getAllAdmins(){
        return (List<AdminEntity>) adminRepository.findAll();
    }
}
