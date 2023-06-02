package A_sql;

public class A_Insert02_evaluation_echo2 {
    public static void main(String[] args) {
        String s = "INSERT INTO `evaluation`(`user_id`, `evaluation_trp`, `evaluation_receivednum`,\n                         `evaluation_receivedvalue`, `evaluation_sentnum`, `evaluation_sentvalue`)\n                 VALUES\n";
        long id = 0, trp, Ravg, Savg;
        for(int x=1; x<=8; x++){
            for(int y=1; y<=8; y++){
                for(int z=1; z<=8; z++){
                    id = (x-1)*8*8+(y-1)*8+z;
                    trp = (id*id*id*id)/256/256/64;
                    Ravg = (id*id)/256+3*id;
                    Savg = (-(id*id)/256+5*id);

                    if(trp <= 3){
                        Ravg = Savg = 0;
                    }
                    s += "                        ("+id+","+trp+","+id+","+Ravg+","+id+","+Savg+"),\n";
                }
            }
        }
        System.out.println(s.substring(0,s.length()-2));
    }
}