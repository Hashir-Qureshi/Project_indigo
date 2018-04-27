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
public class Prog83 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        int num, w = 1;
        Scanner a = new Scanner(System.in);
        System.out.println("Enter 5 numbers");
        do {
            num = a.nextInt();
            System.out.println(num);
            w++;
        } while (w<=5);
    }
    
}

