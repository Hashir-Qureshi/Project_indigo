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
public class Prog90 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        int num, w, counter;
        w = 1;
        counter = 0;
        Scanner a = new Scanner(System.in);
        System.out.println("Enter 5 numbers");
        do {
            num = a.nextInt();
            if (num==99)
                counter++;
            w++;
        } while (w<=5);
        if (counter!=0)
            System.out.println("The number 99 exists in the list");
        else
            System.out.println("The number 99 doesn't exist in the list");
    }
    
}

