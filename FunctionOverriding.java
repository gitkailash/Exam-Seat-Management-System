package kls.assignments;
class Apple{
    void smartPhone(){
        System.out.println("I am Apple and I'm best Smart phone");
    }
}
//extending Apple class
class Samsung extends Apple{
    @Override
    void smartPhone(){
        System.out.println("Samsung makes Apple Screen, Ha ha ha...");
    }
}
public class FunctionOverriding{
    public static void main(String[] args) {
        //creating object of Samsung class
        Samsung obj = new Samsung();
        obj.smartPhone();
    }
}
