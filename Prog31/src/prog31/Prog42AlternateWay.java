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
public class Prog42AlternateWay {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
          int num, w, sum;
          w=1;
          sum=0;
          
            Scanner a = new Scanner(System.in);
            
    System.out.println("Enter the list");
    while (w<=5) {
       num = a.nextInt();
       sum = sum + num;
       w++;
    }
    System.out.println("the sum is " + sum);
}
}