package com.project.backendjavaspringboot.entity;

import javax.persistence.*;

@Entity
@Table(name="parcel")
public class ParcelEntity {
    @Id
    @Column(name="parcel_id")
    @GeneratedValue
    private  int parcelId;

    @Column(name="from_address")
    private String fromAddress;

    @Column(name="to_address")
    private String toAddress;

    @Column(name="from_phone")
    private String fromPhone;

    @Column(name="to_phone")
    private String toPhone;

    private String status;

    @JoinColumn
    @ManyToOne(cascade = CascadeType.ALL)
    private EmployeeEntity employee;

    @JoinColumn
    @ManyToOne(cascade = CascadeType.ALL)
    private AdminEntity admin;

    public int getParcelId() {
        return parcelId;
    }

    public void setParcelId(int parcelId) {
        this.parcelId = parcelId;
    }

    public String getFromAddress() {
        return fromAddress;
    }

    public void setFromAddress(String fromAddress) {
        this.fromAddress = fromAddress;
    }

    public String getToAddress() {
        return toAddress;
    }

    public void setToAddress(String toAddress) {
        this.toAddress = toAddress;
    }

    public String getFromPhone() {
        return fromPhone;
    }

    public void setFromPhone(String fromPhone) {
        this.fromPhone = fromPhone;
    }

    public String getToPhone() {
        return toPhone;
    }

    public void setToPhone(String toPhone) {
        this.toPhone = toPhone;
    }

    public String getStatus() {
        return status;
    }

    public void setStatus(String status) {
        this.status = status;
    }

    public EmployeeEntity getEmployee() {
        return employee;
    }

    public void setEmployee(EmployeeEntity employee) {
        this.employee = employee;
    }

    public AdminEntity getAdmin() {
        return admin;
    }

    public void setAdmin(AdminEntity admin) {
        this.admin = admin;
    }
}
