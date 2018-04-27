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
public class Prog43 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        int num, w;
        w = 1;
        
        Scanner keyboard = new Scanner(System.in);
        Scanner a = new Scanner(System.in);
        
        System.out.println("Enter the list");
        while (w<=5) {
            num = keyboard.nextInt();
            num = a.nextInt();
            if (num%2==0)
                
               w++;  
        System.out.println(num+ " is even number");
       
    }
    }
}