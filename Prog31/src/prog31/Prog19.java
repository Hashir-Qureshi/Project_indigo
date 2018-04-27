/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package prog31;

import java.util.Scanner;

/**
 *
 * @author Anwar Family
 */
public class Prog19 {

    /**
     * @param args the command line arguments
     */
    
    
    
    public static void main(String[] args) {
        
        int x, y;
        Scanner k= new Scanner(System.in);
        
	System.out.println("Enter Value for x");
	x = k.nextInt();

	System.out.println("Enter Value for y");
	y = k.nextInt();	
        
	if ( x > y ) {
           System.out.println(x + " is larger.");
        }
        
        if ( y > x ) {
            System.out.println(x + " is smaller than " + y);      
            
      
            }
      }
    }
    
    
