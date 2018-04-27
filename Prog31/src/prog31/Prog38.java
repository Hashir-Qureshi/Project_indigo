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
public class Prog38 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
          int w, sum;
       sum = 0; 
       w = 7;
       while (w<= 19) {
           sum = sum + w;
           w = w+1;
       }
        System.out.println("the sum is " + sum);
    }
    
} 