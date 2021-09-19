package kls.assignments;

public class FunctionOverloading {
    void iAmOverloading(){
        System.out.println("I don't have Parameter...");
    }
    //overloading function
    void iAmOverloading(String msg){
        System.out.println(msg);
    }
    public static void main(String[] args) {
        FunctionOverloading obj = new FunctionOverloading();
        obj.iAmOverloading();
        obj.iAmOverloading("I have Parameter...");
    }
}
