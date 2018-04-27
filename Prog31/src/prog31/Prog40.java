/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package prog31;

/**
 *
 * @author Class
 */
public class Prog40 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        int w, sum;
        w = 12;
        sum = 0;
     while (w>=5){
         if (w%2!=1)
             sum = sum + w;
         w = w - 1;
     }   
        System.out.println("The sum of odd numbers from 12 to 5 is " + sum);
    }
    
}
