/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package prog31;

import java.util.Scanner;

/**
 *
 * @author G26
 */
public class Prog94 {hjklhjlk

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
       float a,b,x,k;
        k=15;
        while(k!=-99){
            System.out.println("Enter a:");
            
        Scanner K = new Scanner(System.in);
        
        a=K.nextInt();
        
        System.out.println("Enter b:");
        
        b=K.nextInt();
        if (a==0)
            if (b==0)
                System.out.println("All Solution");
            else 
                System.out.println("No Solve");
            else{
                System.out.println("One Solution");
                x=b/a;
                System.out.println(x);}
        System.out.println("To stop enter -99 to continue enter any number");
        k=K.nextInt();
        }
    }
}

