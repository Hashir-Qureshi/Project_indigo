/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package prog31;

import java.util.Scanner;

/**
 *
 * @author Anwar Family
 */
public class Prog48 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        int num, w, counter;
        w = 1;
        counter = 0;
        
        Scanner a = new Scanner(System.in);
        System.out.println("Enter 5 numbers");
        
        while(w<=5) {
            num = a.nextInt();
            
            if(num==9)
                counter++;
            w++;
        }
            if(counter!=0)
                System.out.println("99 exists");
            else
                System.out.println("99 doesnot exist");
    
}
}