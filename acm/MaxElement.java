import java.util.*;

public class MaxElement{
    public static void main(String[] args){
        Scanner reader = new Scanner(System.in);
        int n = reader.nextInt();
        Stack stack = new Stack();
        String line;
        while(n>0){
            line = reader.next();
            String[] tokens = line.split(" ");
            int type = Integer.valueOf(tokens[0]);
            if(type == 1){
                stack.push(Integer.valueOf(tokens[1]));
            }else if(type == 2){
                stack.pop();
            }else if(type == 3){
                printMax(stack);
            }
            n--;
        }
        
    }
    public static void printMax(Stack stack){
        Iterator<Integer> iterator = stack.iterator();
        int max = 0;
        while(iterator.hasNext()){
            int a = iterator.next();
            if(a>max){
                max=a;
            }
        }
        System.out.println(max);
    }
}