package com.project.backendjavaspringboot.repository;

import com.project.backendjavaspringboot.entity.AdminEntity;
import org.springframework.data.repository.CrudRepository;

public interface AdminRepository extends CrudRepository<AdminEntity, Integer> {
}
