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
public class Prog25 {

    /**
     * @param args the command line arguments
     */
    static Scanner x = new Scanner (System.in);
    public static void main(String[] args) {
        System.out.println("Value:");
     
        int a, b;
	Scanner k = new Scanner(System.in);
	
	System.out.println("Enter Value for a");
	a = k.nextInt();
        
	System.out.println("Enter Value for b");
	b = k.nextInt();
	
	if (a==6) {
		b= a* 7;
		a= b *b;
		 }
	else {
		a= b* 7;
		b= a* a;
		if (a==b){
			System.out.println("Wow");
			System.out.println("End");}
		else 
			System.out.println("Goodbye"); }
  }
}

  

