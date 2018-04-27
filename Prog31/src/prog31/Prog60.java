/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package prog31;

/**
 *
 * @author Anwar Family
 */
public class Prog60 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
       int w, sum;
        for (w=5, sum=0;w<=12;w++) {
                                    if (w%2==0)
                                        sum=sum+w;
        }
        System.out.println("The sum of even numbers from 5 through 12 is " +sum);
    }
    
}
