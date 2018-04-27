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
public class Prog63 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        double num, sum;
                sum = 0;
        
        for (int counter=1; counter<=5; counter++){
        
       Scanner a = new Scanner(System.in);
            
    System.out.println("Enter the list");
       num = a.nextInt();
       sum = sum + num;
       
    }
    System.out.println("the sum is " + sum);
}
}