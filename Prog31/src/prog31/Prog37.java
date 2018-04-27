/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package prog31;

/**
 *
 * @author Class
 */
public class Prog37 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        int w = 16;
        while (w<=37){
            if (w%5==0)
                System.out.println(w +" is multiple of 5");
            w = w+1;
        }
    }
    
}
