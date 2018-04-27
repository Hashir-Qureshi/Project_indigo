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
public class Prog39 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
     int w, sum;
     w = 5;
     sum = 0;
     while (w<=12){
         if (w % 2 == 0)
             sum = sum+w;
       w = w+1;
       
     }
        System.out.println("The sum of even number from 5 to 12 is " + sum);
    }
    
}
