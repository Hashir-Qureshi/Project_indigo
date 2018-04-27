/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package prog31;
import java.util.Scanner;
/**
 *
 * @author G23
 */
public class Prog27 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        int a, b;
	Scanner k = new Scanner(System.in);
	
	System.out.println("Enter Value for a");
	a = k.nextInt();
        
	System.out.println("Enter Value for b");
	b = k.nextInt();

	if (a==0){
		if (b==0) {
			System.out.println("All solutions");
                } else {
			System.out.println("No solutions");
                }
        } else {
 		System.out.println("One solution");
		int x = -b/a;
		System.out.println(x); }
        }

}