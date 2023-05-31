package A_sql;
public class Insert_evaluation_echo {
    public static void main(String[] args) {
        String s = "INSERT INTO `evaluation`(`user_id`, `evaluation_trp`, `evaluation_receivednum`, `evaluation_receivedvalue`, `evaluation_sentnum`, `evaluation_sentvalue`) VALUES ";
        int id = 0;
        for(int i=1;i<=26;i++){
            for(int j=1;j<=26;j++){
                id = (i-1)*26+j;
                s += "("+id+","+((id*id+id)/64)+","+id+","+(int)((id*id)/338+3*id)+","+id+","+(int)(-(id*id)/338+5*id)+"),";
            }
        }

        System.out.println(s.substring(0,s.length()-1));
    }
}