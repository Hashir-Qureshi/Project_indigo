/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package prog31;

/**
 *
 * @author G20
 */
public class Prog79 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        int w;
        w=16;
        do {
            if (w%5==0)
                System.out.println(w+ " is a multiple of 5");
            w++;
        } while (w<=37);
    }
    
}
