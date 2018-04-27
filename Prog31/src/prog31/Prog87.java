/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package prog31;

import java.util.Scanner;

/**
 *
 * @author G20
 */
public class Prog87 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        //while loop
        int num, w;
        w = 1;
        Scanner a = new Scanner(System.in);
        System.out.println("Enter 5 numbers");
        do {
            num = a.nextInt();
            if (w==1)
                System.out.println("The first number is " + num);
            if (w==5)
                System.out.println("The last number is " + num);
            w++;
        } while (w<=5);
    }
    
}

