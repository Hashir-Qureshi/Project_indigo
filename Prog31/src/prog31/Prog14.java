/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package prog31;

/**
 *
 * @author Scan05
 */
public class Prog14 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        int a, b, c;
        a=5;
        b=8;
        c=11;
        
     if (a>b)
         if (a>c)
            System.out.println(a+" is the largest");
     else
            System.out.println(c+" is the largest");
     else if  (b>c) 
            System.out.println(b+" is the largest");
     else
            System.out.println(c+" is the largest");            
    }
    
}
