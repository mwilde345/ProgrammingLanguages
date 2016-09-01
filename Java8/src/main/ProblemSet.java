package main;
import java.util.stream.*;
import java.util.ArrayList;
import java.util.Arrays;
import java.util.Collections;
import java.util.function.*;
import java.lang.Math;
public class ProblemSet {
	public static void main(String[] args){
		ProblemSet ps = new ProblemSet();		
	}
	
	public ProblemSet(){
		//DotProduct testing
		System.out.println("Dot Product");
		System.out.println(DotProductTest(new int[]{2,4,6,8,10},new int[]{1,3,5,7,9}));
		//Hypotenuse Testing
		System.out.println("Hypotenuse");
		System.out.println(Hypotenuse(5,20));
		//SphereRadius
		System.out.println("Sphere Volume");
		System.out.println(SphereVolume(20.4));
		//Water Temperature
		System.out.println("Water Temperature");
		System.out.println(WaterTemp(190));
		//Double Sequence
		System.out.println("Double Sequence");
		DoubleSeq(new int[]{10,20,30,40,50});
		//DuplicateSequence
		System.out.println("");
		System.out.println("Duplicate Sequence");
		DuplicateSeq(new String[] {"first","second","third","fourth"});
		//Remove Duplicates
		System.out.println("Remove Duplicates");
		RemoveDuplicate(new String[]{"1","2","3","3","4","5","7","4","10","4","3","6"});
		//Sum and Product
		System.out.println("");
		System.out.println("Sum and Product");
		SumProduct(new int[]{2,4,6,8,9},"product");
		//ListofPosities
		System.out.println("List of Positives");
		PosList(new int[]{-2,3,6,8,-10,3,-29});
		System.out.println("");
		//Max
		System.out.println("Max");
		MaxFind(new int[]{20,300,-120,3,55});
	}
	
	public int DotProductTest(int[] a,int[] b){
		return IntStream.range(0,a.length).map(n->a[n]*b[n]).sum();
	}
	public double Hypotenuse(int base, int height){
		return (Math.sqrt(base^2+height^2));
	}
	public double SphereVolume(double a){
		return ((4.0/3.0)*(Math.PI)*Math.pow(a,3));
	}
	public String WaterTemp(double temp){
		return temp <=32 ? "Solid" : temp>32&&temp<=212 ? "Liquid" : temp>212 ? "Gas" : "Fail";
	}
	public void DoubleSeq(int [] a){
		IntStream.range(0, a.length).map(n->a[n]*2).forEach(x->System.out.print(x+" "));
	}
	public void DuplicateSeq(String[] a){
		Arrays.stream(a).forEach(s->System.out.println(s+" "+s));
	}
	public void RemoveDuplicate(String [] a){
		Arrays.stream(a).distinct().forEach(n->System.out.print(n+" "));
	}
	public void SumProduct(int [] a,String procedure){
		switch(procedure){
		case "sum":
			System.out.println(IntStream.range(0, a.length).map(n->a[n]).sum());
			break;
		case "product":
			System.out.println(IntStream.range(0,a.length).map(n->n<a.length-1?a[n]*a[n+1]:a[n]*a[a.length-1]).sum());
		default:
			break;
		}
	}
	public void PosList(int[] a){
		IntStream.range(0,a.length).filter(n->a[n]>0).forEach(x->System.out.print(x+" "));
	}
	public void MaxFind(int[] a){
		System.out.println(IntStream.range(0, a.length).map(n->a[n]).max());
	}
}
