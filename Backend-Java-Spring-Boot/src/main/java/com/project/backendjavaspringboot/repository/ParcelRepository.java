package com.project.backendjavaspringboot.repository;

import com.project.backendjavaspringboot.entity.EmployeeEntity;
import com.project.backendjavaspringboot.entity.ParcelEntity;
import org.springframework.data.repository.CrudRepository;

import java.util.List;

public interface ParcelRepository extends CrudRepository<ParcelEntity, Integer> {
    List<ParcelEntity> findParcelEntitiesByEmployee(EmployeeEntity employeeEntity);
    List<ParcelEntity> findParcelEntitiesByEmployeeAndStatusEquals(EmployeeEntity employeeEntity, String status);
}
