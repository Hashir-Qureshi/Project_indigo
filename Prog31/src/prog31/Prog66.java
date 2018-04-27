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
public class Prog66 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        int num;
    Scanner a = new Scanner(System.in);
    
    System.out.println("Enter the list");
         for (int counter=1; counter<=5; counter++){
            num = a.nextInt();
            
        if(counter==1)
               System.out.println("the first number is " +num);
        if(counter==5)
               System.out.println("the last number is " +num);
    
}
    }
}