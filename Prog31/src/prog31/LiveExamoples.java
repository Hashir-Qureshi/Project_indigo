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
public class LiveExamoples {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
     int a, b;
        Scanner k= new Scanner(System.in);
        
	System.out.println("Enter Value for a");
	a = k.nextInt();
        
	System.out.println("Enter Value for b");
	b = k.nextInt();	
        
        
        if ( a > b ) {
           System.out.println(a + " is larger.");
        } else {
           System.out.println(a + " is smaller than " + b);
        }
    }    
} 