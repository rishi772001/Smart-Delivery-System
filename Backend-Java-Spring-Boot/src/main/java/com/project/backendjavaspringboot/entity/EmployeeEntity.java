package com.project.backendjavaspringboot.entity;

import javax.persistence.*;

@Entity
@Table(name = "employee")
public class EmployeeEntity {
    @Id
    @Column(name = "emp_id")
    @GeneratedValue
    private int empId;

    private String name;

    private String area;

    private String password;

    public String getPassword() {
        return password;
    }

    public void setPassword(String password) {
        this.password = password;
    }

    public int getEmpId() {
        return empId;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public String getArea() {
        return area;
    }

    public void setArea(String area) {
        this.area = area;
    }

    public void display(){
        System.out.println(this.empId + " " + this.name + " " + this.area + " " + this.password);
    }
}
