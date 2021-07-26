package com.project.backendjavaspringboot.repository;

import com.project.backendjavaspringboot.entity.EmployeeEntity;
import org.springframework.data.repository.CrudRepository;

public interface EmployeeRepository extends CrudRepository<EmployeeEntity, Integer> {
}
