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
@CrossOrigin(origins = "*")
public class ParcelController {
    @Autowired
    private ParcelService parcelService;

    @GetMapping
    public List<ParcelEntity> getAllParcels(){
        return parcelService.getAllParcels();
    }

    @PostMapping
    public ResponseEntity<EmployeeEntity> addParcel(@RequestBody ParcelEntity parcel){
        EmployeeEntity emp = parcelService.addParcel(parcel);
        if(emp == null)
            return new ResponseEntity<>(HttpStatus.BAD_REQUEST);
        return new ResponseEntity<>(emp, HttpStatus.CREATED);
    }

    @GetMapping("/{id}")
    public ResponseEntity<Optional<ParcelEntity>> getParcel(@PathVariable("id") int id){
        return new ResponseEntity<>(parcelService.getParcel(id), HttpStatus.ACCEPTED);
    }

    @GetMapping("/employee/{id}")
    public ResponseEntity<List<ParcelEntity>> getParcelByEmployee(@PathVariable("id") int id){
        return new ResponseEntity<>(parcelService.getParcelsByEmployee(id), HttpStatus.ACCEPTED);
    }

    @GetMapping("/path/{id}")
    public ResponseEntity<List<ParcelEntity>> getPath(@PathVariable("id") int id){
        return new ResponseEntity<>(parcelService.getPath(id), HttpStatus.ACCEPTED);
    }

    @PutMapping("/{id}")
    public ResponseEntity<ParcelEntity> updateStatus(@PathVariable("id") int id){
        ParcelEntity parcel = parcelService.updateStatus(id);
        if(parcel != null){
            return new ResponseEntity<>(parcel, HttpStatus.OK);
        }
        return new ResponseEntity<ParcelEntity>(parcel, HttpStatus.BAD_REQUEST);
    }
}
