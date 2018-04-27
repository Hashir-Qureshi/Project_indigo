/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package prog31;

/**
 *
 * @author Anwar Family
 */
public class Employee {
     EmployeeData emp = new EmployeeData("Mansoor","Mastan","Union Street", 11355,1000);
     EmployeeData emp1 = new EmployeeData("Mansoor","Mastan","Union Street", 11355,1001);
     
   class EmployeeData{
       private String fName,lName,adress;
       private int zipCode,empID;
       
       public EmployeeData(String fname,String lName, String address,int zipCode, int empID){
           this.fName=fname;
           this.lName=lName;
           this.adress=address;
           this.zipCode=zipCode;
           this.empID=empID;
       }
       
      public EmployeeData(){
           
       }
       
       public String getFName(){
           return this.fName;
       }
       
       public void setFName(String fname){
           this.fName=fname;
       }
       
       public String getLName(){
           return this.lName;
       }
       
       public void setLName(String lname){
           this.lName=lname;
       }
       
       public String getAddress(){
           return this.adress;
       }
       
       public void setAddress(String address){
           this.adress=address;
       }
       
       public int getZipCode(){
           return this.zipCode;
       }
       
       public void setZipCode(int zipCode){
           this.zipCode=zipCode;
       }
       
       public int getEmpID(){
           return this.empID;
           
       }
       
       public void setEmpID(int empID){
           this.empID=empID;
       }
       
       public String toString(){
           return "FirstName :-"+this.getFName() +"\n LastName :- "+this.getLName()+
                   "\n Address :- "+this.getAddress() +"\n Employee ID :-"+this.getEmpID()+
                   "\n ZipCode :-"+this.getZipCode();
       }
       
       public boolean equals(Object obj){
          EmployeeData emp = (EmployeeData)obj;
           return this.fName.equals(emp.fName) && this.lName.equals(emp.lName) &&
                   this.adress.equals(emp.adress) && this.zipCode==emp.zipCode 
                   && this.empID==emp.empID;
       }       
   }
    
    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        // TODO code application logic here
          Employee employee = new Employee();
         /*employee.emp.setFName("Mansoor");
         employee.emp.setLName("Mastan");
         employee.emp.setAddress("UniionStreet");
         employee.emp.setEmpID(Integer.parseInt("1000"));
         employee.emp.setZipCode(Integer.parseInt("11355"));*/
         System.out.print("are employees same "+employee.emp.equals(employee.emp1)+"\n");
         System.out.println(employee.emp);
         
         System.out.println("HasCode of employee data is :-"+employee.emp.hashCode());
    }
    
}
