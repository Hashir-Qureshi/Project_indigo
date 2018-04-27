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
public class Prog80 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        int w, sum;
        w=7;
        sum=0;
        do {
            sum = sum + w;
            w++;
        } while (w<=19);
        System.out.println("The sum of number 7 through 19 is " + sum);
    }
    
}
