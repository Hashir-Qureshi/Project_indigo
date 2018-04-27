/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package prog31;

import java.util.Scanner;

/**
 *
 * @author Class
 */
public class Prog45 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        int num, w;
        w = 1;
        
       Scanner a = new Scanner(System.in);
       
       System.out.println("Enter the list");
       
       while (w<=5){
        num = a.nextInt();
        
        if(w==1)
               System.out.println("the first number is " +num);
        if(w==5)
               System.out.println("the last number is " +num);
        w++;
    }
    }
}