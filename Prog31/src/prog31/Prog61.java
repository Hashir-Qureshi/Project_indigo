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
public class Prog61 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
         int w, sum;
        for (w=12, sum=0;w>=5;w--) {
                                    if (w%2!=0)
                                        sum=sum+w;
        }
        System.out.println("The sum of odd numbers from 12 to 5 is " + sum);
    }
    
}
