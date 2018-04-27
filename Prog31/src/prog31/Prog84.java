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
public class Prog84 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        int num, w, sum;
        w = 1;
        sum = 0;
        Scanner a = new Scanner(System.in);
        System.out.println("Enter 5 numbers");
        do {
            num = a.nextInt();
            sum = sum+num;
            w++;
        } while (w<=5);
        System.out.println("The sum of the 5 numbers is " + sum);
    }
    
}
