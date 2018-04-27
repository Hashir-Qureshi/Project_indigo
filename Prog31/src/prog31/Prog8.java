/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package prog31;

/**
 *
 * @author Scan05
 */
public class Prog8 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        int a, b, c, d, x, y;
        a = 5;
        b = 2;
        c = 6;
        d = 3;
        x = a+b*c%(b*b)%a-c*d;
        y=(a+b)*c%b*(b%a)-c*d;
        System.out.println("The result of x= " + x);
        System.out.println("The result of y= " + y);
    }
    
}
