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
public class Prog68 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        int num, w, counter;
        Scanner a = new Scanner(System.in);
        System.out.println("Enter 5 numbers");
        for (w=1, counter=0;w<=5;w++) {
                                        num = a.nextInt();
                                        if (num==99)
                                            counter++;
        }
        System.out.println("There is/are " + counter + " 99 in your list");
    }
    
}