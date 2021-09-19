package kls.assignments;
class Function {
    //user defined function
    void function1() {
        //creating class
        class ConstructorDemo {
            //this is also default Constructor
            ConstructorDemo() {
                System.out.println("I am default constructor...");
            }
            //this is parameterized constructor
            ConstructorDemo(String msg) {
                System.out.println(msg);
            }
        }
        //creating object of inner class
        ConstructorDemo obj1 = new ConstructorDemo(); //default constructor
        ConstructorDemo boj2 = new ConstructorDemo("I am Parameterized Constructor..."); //parameterized constructor
    }
    public static void main(String[] args) {
        //creating objet of Function class
        Function obj = new Function();
        obj.function1();
    }
}