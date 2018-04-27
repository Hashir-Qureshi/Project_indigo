/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package prog31;

/**
 *
 * @author G20
 */
public class Prog82 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
     int w, sum;
        w=12;
        sum=0;
        do {
            if (w%2!=0)
                sum = sum + w;
            w--;
        } while (w>=5);
        System.out.println("The sum of odd numbers from 12 down to 5 is " + sum);
    }
    
}