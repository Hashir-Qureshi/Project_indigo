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
public class Prog64 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        int num, w, sum;
        Scanner a = new Scanner(System.in);
        System.out.println("Enter 5 numbers");
        for (w=1, sum=0;w<=5;w++) {
                                    num=a.nextInt();
                                    if (num%2==0)
                                        System.out.println(num);
        }
    }
}