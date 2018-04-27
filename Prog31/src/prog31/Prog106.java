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
public class Prog106 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        int[]days = {31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31};
        for (int index = 0; index <12; index++)
            
            System.out.println("Month " +(index + 1) +" has " +days[index] +" days.");
    }
    
}
