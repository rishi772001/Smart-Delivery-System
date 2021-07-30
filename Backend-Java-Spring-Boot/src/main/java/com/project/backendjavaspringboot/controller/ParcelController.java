package com.project.backendjavaspringboot.controller;

import com.project.backendjavaspringboot.entity.EmployeeEntity;
import com.project.backendjavaspringboot.entity.ParcelEntity;
import com.project.backendjavaspringboot.service.ParcelService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

import java.util.List;
import java.util.Optional;

@RestController
@RequestMapping("/parcels")
public class ParcelController {
    @Autowired
    private ParcelService parcelService;

    @GetMapping
    public List<ParcelEntity> getAllParcels(){
        return parcelService.getAllParcels();
    }

    @PostMapping
    public EmployeeEntity addParcel(@RequestBody ParcelEntity parcel){
        return parcelService.addParcel(parcel);
    }

    @GetMapping("/{id}")
    public ResponseEntity<Optional<ParcelEntity>> getParcel(@PathVariable("id") int id){
        return new ResponseEntity<>(parcelService.getParcel(id), HttpStatus.ACCEPTED);
    }

    @GetMapping("/employee/{id}")
    public ResponseEntity<List<ParcelEntity>> getParcelByEmployee(@PathVariable("id") int id){
        return new ResponseEntity<>(parcelService.getParcelsByEmployee(id), HttpStatus.ACCEPTED);
    }
}
