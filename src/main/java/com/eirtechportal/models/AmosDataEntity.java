package com.eirtechportal.models;

public class AmosDataEntity {

    //--  All the items from the Source CSV file
    private int itemNo;
    private String docNo;
    private String docType;
    private String docRev;
    private String docComponent;
    private String docAC;
    private String docATA;
    private String docStats;
    private String docRep;
    private String docDate;

    private String docTahTsn;
    private String docTacCsn;
    private String docWo;
    private String docAcOrRotable;
    private String docDueDim1;

    private String docSubject;

    public int getItemNo() {
        return itemNo;
    }

    public void setItemNo(int itemNo) {
        this.itemNo = itemNo;
    }

    public String getDocNo() {
        return docNo;
    }

    public void setDocNo(String docNo) {
        this.docNo = docNo;
    }

    public String getDocType() {
        return docType;
    }

    public void setDocType(String docType) {
        this.docType = docType;
    }

    public String getDocRev() {
        return docRev;
    }

    public void setDocRev(String docRev) {
        this.docRev = docRev;
    }

    public String getDocComponent() {
        return docComponent;
    }

    public void setDocComponent(String docComponent) {
        this.docComponent = docComponent;
    }

    public String getDocAC() {
        return docAC;
    }

    public void setDocAC(String docAC) {
        this.docAC = docAC;
    }

    public String getDocATA() {
        return docATA;
    }

    public void setDocATA(String docATA) {
        this.docATA = docATA;
    }

    public String getDocStats() {
        return docStats;
    }

    public void setDocStats(String docStats) {
        this.docStats = docStats;
    }

    public String getDocRep() {
        return docRep;
    }

    public void setDocRep(String docRep) {
        this.docRep = docRep;
    }

    public String getDocDate() {
        return docDate;
    }

    public void setDocDate(String docDate) {
        this.docDate = docDate;
    }

    public String getDocTahTsn() {
        return docTahTsn;
    }

    public void setDocTahTsn(String docTahTsn) {
        this.docTahTsn = docTahTsn;
    }

    public String getDocTacCsn() {
        return docTacCsn;
    }

    public void setDocTacCsn(String docTacCsn) {
        this.docTacCsn = docTacCsn;
    }

    public String getDocWo() {
        return docWo;
    }

    public void setDocWo(String docWo) {
        this.docWo = docWo;
    }

    public String getDocAcOrRotable() {
        return docAcOrRotable;
    }

    public void setDocAcOrRotable(String docAcOrRotable) {
        this.docAcOrRotable = docAcOrRotable;
    }

    public String getDocDueDim1() {
        return docDueDim1;
    }

    public void setDocDueDim1(String docDueDim1) {
        this.docDueDim1 = docDueDim1;
    }

    public String getDocSubject() {
        return docSubject;
    }

    public void setDocSubject(String docSubject) {
        this.docSubject = docSubject;
    }

    @Override
    public String toString() {
        return "AmosDataEntity{" +
                "itemNo=" + itemNo +
                ", docNo='" + docNo + '\'' +
                ", docType='" + docType + '\'' +
                ", docRev='" + docRev + '\'' +
                ", docComponent='" + docComponent + '\'' +
                ", docAC='" + docAC + '\'' +
                ", docATA='" + docATA + '\'' +
                ", docStats='" + docStats + '\'' +
                ", docRep='" + docRep + '\'' +
                ", docDate='" + docDate + '\'' +
                ", docTahTsn='" + docTahTsn + '\'' +
                ", docTacCsn='" + docTacCsn + '\'' +
                ", docWo='" + docWo + '\'' +
                ", docAcOrRotable='" + docAcOrRotable + '\'' +
                ", docDueDim1='" + docDueDim1 + '\'' +
                ", docSubject='" + docSubject + '\'' +
                '}';
    }
}
