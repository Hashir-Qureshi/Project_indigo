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
public class Prog29 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
      double a,b,c,d,x,x1,x2;
            System.out.println("enter the first coefficent:");
        Scanner k= new Scanner(System.in);
        a=k.nextDouble();
        System.out.print("enter the second coefficent:");
        b=k.nextDouble();
        System.out.print("enter the third coefficent:");
        c=k.nextDouble();
        if(a==0)
            if(b==0)
                if (c==0)
                    System.out.println("all solution");
                else
                    System.out.println("no solution");
            else {
                System.out.println("one solution");
                x=-b/c;
                System.out.println("x=" + x);
            }
        else {//a not zero
            d=b*b-4*a*c;
            if (d<0)
                System.out.println("No Solution");
            else if (d==0){
                System.out.println("duplicate solution");
                x=-b/c;
                System.out.println("x=" + x);
            }
            else {
                System.out.println("two solution");
                x1=(-b+Math.sqrt(d))/2*a;
                x2=(-b-Math.sqrt(d))/2*a;
                System.out.println("x1=" +x1+ "and x2=" +x2);
            }
        }//a not zero
                
    }
    
}
  