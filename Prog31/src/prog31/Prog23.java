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
public class Prog23 {

    /**
     * @param args the command line arguments
     */
    static Scanner x = new Scanner (System.in);
    public static void main(String[] args) {
        int a, b, c;

	Scanner k = new Scanner(System.in);
	
	System.out.println("Enter Value for a");
	a = k.nextInt();
        
	System.out.println("Enter Value for b");
	b = k.nextInt();

	System.out.println("Enter Value for c");
	c = k.nextInt();
	
	if (a>b){
		if (a>c)
			System.out.println(a + " is the largest");
		else
			System.out.println(b + " is the largest"); }
	else if (b > c)
		System.out.println(b + " is the largest");
	else 
		System.out.println(c + " is the largest");
   }
}